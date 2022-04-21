from flask import Flask, request, jsonify
import Scraper

app = Flask(__name__)

@app.route('/scrape', methods =['POST'])
def scrape():
    url = request.form['url']
    user_id = request.form['user_id']
    data = Scraper.main(url, user_id)
    return jsonify(data)

if __name__ == "__main__":
    app.run(debug=False, host= '0.0.0.0')
