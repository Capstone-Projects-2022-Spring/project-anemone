from python:3.8.13-alpine3.15
WORKDIR app
COPY project-anemone/public/requirements.txt .
COPY project-anemone/public/app.py .
COPY project-anemone/public/Scraper.py .
RUN pip install -r requirements.txt
EXPOSE 5000
CMD python app.py

