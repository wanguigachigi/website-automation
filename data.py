import csv
import smtplib
from credentials import SENDER_EMAIL, SENDER_PASSWORD


Notification_msg = """
Hello {},

Hope this finds you well.

We will be carrying out afforestation initiative in your location!

You are therefore invited on 3/5/2018 to participate.

More details to follow.

yours truly,
SaveTheEnvironment Team. 
"""

Notification1_msg = """
Hello {},

Hope this finds you well.

We will be carrying out afforestation initiative in Nanyuki!

You are therefore invited on 3/5/2018 to participate.

More details to follow.

yours truly,
SaveTheEnvironment Team. 

"""

with open("data1.csv") as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=",")
    next(csv_reader)

    smtp = smtplib.SMTP('smtp.gmail.com')
    smtp.ehlo()
    smtp.starttls()
    smtp.ehlo()
    smtp.login(SENDER_EMAIL, SENDER_PASSWORD)

    for row in csv_reader:
        name, email, location = row
        print(row)

        if location == 'nanyuki':
            msg = Notification_msg.format(name)
            subject = "AFFORESTATION INITIATIVE."
        else:
            msg = Notification1_msg.format(name)
            subject = "AFFORESTATION INITIATIVE."

        email_msg = "Subject: {} \n\n{}".format(subject, msg)
        smtp.sendmail(SENDER_EMAIL, email, email_msg)

    smtp.quit()


        #print("Send e-mail to {}".format(email))
        #print("E-mail content:")
        #print(msg)

