from flask import Flask, request
import Scraper

app = Flask(__name__)

@app.route('/scrape', methods =['POST'])
def scrape():
    url = request.form['url']
    user_id = request.form['user_id']
    Scraper.main(url, user_id)
    return "200"

if __name__ == "__main__":
    app.run(debug=False)
