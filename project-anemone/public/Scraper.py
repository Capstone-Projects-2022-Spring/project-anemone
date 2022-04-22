from bs4 import BeautifulSoup #pip install beautifulsoup4
import requests #pip install requests
import mysql.connector #pip install mysql-connector-python
import datetime
from urllib.parse import urlparse
import os

def main(url, user_id):
    body, header = scrape(url)
    #print(body)
    return insert(body, url, user_id, header)

def scrape(url):
    page = requests.get(url) #load page

    soup = BeautifulSoup(page.content, 'html.parser') #make page readable/writable
    for nav in soup.select("nav"): #excludes nav tag
        nav.extract()

    for footer in soup.select("footer"): #excludes footer tag
        footer.extract()

    try: #Tries to find a page header, makes the name of the file the domain of the website if a header isn't found
        title = soup.find("title")
        header = title.text.strip()
    except:
        header = extract_domain(url)

    return cleanup(soup, url), header

def insert(body, url, user_id, header):
    cnx = mysql.connector.connect(user= "root", password= "password",
                              host= "mysql",
                              database= "project_anemone") #make user your DB_USERNAME and password your DB_PASSWORD in the .env
    cursor = cnx.cursor()

    id = cursor.lastrowid
    now = datetime.datetime.now()
    add_content = """INSERT INTO documents (id, created_at, updated_at, user_id, name, url, file_type, url_data) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"""
    values = (id, now, now, user_id, header, url, "txt", body)

    cursor.execute(add_content, values)
    cnx.commit()

    cursor.close()
    cnx.close()

    return url, body

def cleanup(soup, url):
    domain = extract_domain(url)
    output = []
    if(domain == "docs.python.org"):
        for result in soup.find_all('div', attrs={"class":"documentwrapper"}):
            stripped = result.text.strip()
            output.append(stripped)
    elif(domain == "docs.docker.com"):
        for result in soup.find_all('section', attrs={"class":"section"}):
            stripped = result.text.strip()
            output.append(stripped)
    elif(domain == "laravel.com"):
        ul = soup.find("ul") 
        ul.extract()
        
        for result in soup.find_all('div', attrs={"id":"main-content"}):
            stripped = result.text.strip()
            output.append(stripped)
    else:
        for result in soup.find_all(['p', 'a']): #finds and isolates all p tags
            stripped = result.text.strip()
            output.append((stripped.replace('\n','')))

    body = '\n'.join(output) #needs to be a string or else the connector won't take it
    return body


def extract_domain(url):
    domain = urlparse(url).netloc
    return domain