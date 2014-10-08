import json
import ast

from pprint import pprint
json_data=open("100songs_modified.txt")

data = ast.literal_eval(json_data.read())
pprint(data)


records = open('artists.txt', 'w')

for song in data:
	records.write('INSERT INTO strike_a_chord.artists (name) VALUES ("'+song['artist']+'");\n')
for song in data:
	records.write('INSERT INTO strike_a_chord.perform (name, sid) VALUES ((select name from strike_a_chord.artists where name="'+song['artist'].strip()+'"), (select sid from strike_a_chord.songs where name="'+song['title'].strip()+'"));\n')

records.close()