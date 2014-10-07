from bs4 import BeautifulSoup
import bs4
import urllib2

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
	
file_object = open('100songs.txt', 'w') 
	
file_object.write(str(return_object))
file_object.close()	
	
records = open('sql_insert_records.txt', 'w')

for song in return_object:
	records.write('INSERT INTO strike_a_chord.songs (name) VALUES ("'+song['title']+'");')
	for c in song['chords']:
		records.write('INSERT INTO strike_a_chord.chords (cname, name) VALUES ("'+c+'", "'+c+'");')

records.close()
	
print return_object
print len(return_object)

# 	print chords
	
	

	