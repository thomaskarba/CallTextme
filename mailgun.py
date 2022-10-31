#MailGun

def send_simple_message(to):
    return requests.post(
        "https://api.mailgun.net/v3/tom.calltext.me/messages",
        auth=("api", "952f5dea2bfd8ca26da1b90877e97bec-ba042922-9f865d42"),
        data={"from": "no-reply@calltext.me",
              "to": [to, "tkimssg@gmail.com"],
              "subject": "Hello",
              "text": "Testing some Mailgun awesomness!"})

import MySQLdb

db = MySQLdb.connect(host="mysqlcluster27.registeredsite.com",    # your host, usually localhost
                     user="thomaskarba",         # your username
                     passwd="Register1987",  # your password
                     db="qmr")        # name of the data base

cur = db.cursor()

cur.execute("SELECT email FROM users WHERE email='tkimssg@gmail.com'")

for row in cur.fetchall():
    send_simple_message(row)
	print(row)

db.close()

row
