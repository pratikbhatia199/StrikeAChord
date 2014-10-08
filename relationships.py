import json
import ast

from pprint import pprint
json_data=open("100songs_modified.txt")

data = ast.literal_eval(json_data.read())
pprint(data)


records = open('relationships.txt', 'w')

for song in data:
	for c in song['chords']:
		records.write('INSERT INTO strike_a_chord.has_chords (sid, cid) VALUES ((select sid from strike_a_chord.songs where name="'+song['title']+'"), (select cid from strike_a_chord.chords where cname="'+c+'"));\n')

records.close()