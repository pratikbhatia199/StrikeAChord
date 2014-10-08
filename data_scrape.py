from bs4 import BeautifulSoup
import bs4
import urllib2
from datetime import timedelta
from random import randrange
import datetime




def data_scraper():
    page = urllib2.urlopen("http://www.ultimate-guitar.com/top/top100_chords.htm")
    soup = BeautifulSoup(page)
    hits = None
    hits_urls = []
    return_object =[]
    #title, artist, chords
    chords_list = []
    for table in soup('table', cellpadding='2'):
        table_length= len(table.contents)
        if(table_length > 100):
            hits = table.contents
            print table_length
    for row in hits:
        if(type(row) != bs4.element.NavigableString):
            anchors = row.contents[3]
            if(len(anchors.contents)>0):
                hits_urls.append(anchors.contents[1]['href'])
    print len(hits_urls)


    for url in hits_urls:
        url_page = urllib2.urlopen(url)
        url_soup = BeautifulSoup(url_page)
        song = url_soup.find("div", { "class" : "t_title" })
        artist = url_soup.find("div", { "class" : "t_autor" })
        new_object ={}
        new_object['title'] = song.h1.string
        new_object['title'] = new_object['title'].replace('Chords', '')
        new_object['artist'] = artist.a.string
        chords= url_soup.find(id='chords_list')
        chords['style']='display:block;'
        song_chords=[]
        chords= url_soup.find("div", { "class" : "tb_ct" })
        for child in chords.div.contents[5].findAll('span'):
            if(not (child.string in song_chords)):
                song_chords.append(child.string)
    # 	print song_chords
        new_object['chords']= song_chords
        return_object.append(new_object)
        print url

    file_object = open('100songs_modified.txt', 'w')

    file_object.write(str(return_object))
    file_object.close()

    records = open('sql_insert_records_modified.txt', 'w')

    for song in return_object:
        records.write('INSERT INTO strike_a_chord.songs (name) VALUES ("'+song['title']+'");\n')
        for c in song['chords']:
            records.write('INSERT INTO strike_a_chord.chords (cname, name) VALUES ("'+c+'", "'+c+'");\n')

    records.close()

    print return_object
    print len(return_object)


def username_scraper():
    file_users = open('username_file.txt', 'w')

    list_data = []
    with open('usernames', "rb") as file:
        for line in file:
            list_data.append(line.strip().split())
            line_data = line.strip().split()
            print line_data
            if len(line_data) == 3:
                username = line_data[2].split('@')
                file_users.write('INSERT INTO basic_user (username, firstname, lastname) VALUES ("'+username[0]+'", "'+line_data[0]+'" , "'+line_data[1] +'"); \n')
                file_users.write('INSERT INTO basic_user (username, firstname, lastname) VALUES ("'+username[0]+'", "'+line_data[0]+'" , "'+line_data[1] +'"); \n')
            if len(line_data) == 4:
                username = line_data[3].split('@')
                file_users.write('INSERT INTO basic_user (username, firstname, lastname) VALUES ("'+username[0]+'", "'+line_data[0]+'" , "'+line_data[2] +'"); \n')




def random_date(start, end):
    """
    This function will return a random datetime between two datetime
    objects.
    """
    delta = end - start
    print delta
    int_delta = (delta.days * 24 * 60 * 60) + delta.seconds
    print int_delta
    random_second = randrange(int_delta)
    return start + timedelta(seconds=random_second)

def generate_day_between_today_and_past_three_months():
    today = datetime.date.today()
    last_three_months = today - datetime.timedelta(days=90)
    print today, last_three_months
    random_date_val = random_date(last_three_months, today)
    print random_date_val


#username_scraper()
#data_scraper()
generate_day_between_today_and_past_three_months()