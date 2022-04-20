import sys
from bs4 import BeautifulSoup #pip install beautifulsoup4
import requests #pip install requests
import mysql.connector #pip install mysql-connector-python
import datetime
from urllib.parse import urlparse
import os

def main(url, user_id):
    body, header = scrape(url)
    #print(body)
    insert(body, url, user_id, header)

def scrape(url):
    page = requests.get(url) #load page

    soup = BeautifulSoup(page.content, 'html.parser') #make page readable/writable
    for nav in soup.select("nav"): #excludes nav tag
        nav.extract()

    for footer in soup.select("footer"): #excludes footer tag
        footer.extract()

    title = soup.find("title")
    header = title.text.strip()

    return cleanup(soup, url), header

def insert(body, url, user_id, header):
    cnx = mysql.connector.connect(user= os.environ.get('DB_USERNAME'), password= os.environ.get('DB_PASSWORD'),
                              host= os.environ.get('DB_HOST'),
                              database= os.environ.get('DB_DATABASE'))
    cursor = cnx.cursor()

    id = cursor.lastrowid
    now = datetime.datetime.now()
    add_content = """INSERT INTO documents (id, created_at, updated_at, user_id, name, url, file_type, url_data) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"""
    values = (id, now, now, user_id, header, url, "txt", body) #edit the 9 here to any user_id value currently stored in your user table

    cursor.execute(add_content, values)
    cnx.commit()

    cursor.close()
    cnx.close()

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
    elif(domain == "stackoverflow.com"):
        for result in soup.find_all('div', attrs={"role":"mainbar"}):
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