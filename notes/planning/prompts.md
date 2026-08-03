I'm changing some things in my db structure. This...

profiles
--------

user_id
location
bio
typical_discipline_id
typical_distance_range_id
typical_pace_id
etc.

...will be replaced by...

profiles
--------

user_id
location
bio
etc.

...and an additional table...

typical_rides
-------------

id
profile_id
name
min_distance
max_distance
ride_type_id
discipline_id
pace_id
etc. (perhaps)

...so profile can contain multiple typical rides as there may be some diverse riders.
Apart from id, profile_id and name, columns are optional (nullable).
TypicalRide may also provide the basis for personalized quick search options down the road.

So, given these changes, please provide an updated version of file relationships.md as well as of schema.md, where needed.

For context, if needed, I added file rider-profile.md, containing parts of previous chats (therefore, some pieces of it may be outdated). Feel free to create a summary (meaning, only brief explanations, if any) of an updated version of rider-profile.md.

Furthermore, since I'm about to create profile.show page, please provide a list of tests you would add to ProfileShowTest.php, in the form of pest test stubs (empty function body, optionally clarifying comments). Keep in mind that, apart from providing test coverage for the crucial features of profile.show, I want to use these tests as workflow guide (still aiming at establishing a loose tdd routine, in which I have only been partially successful as of now). Thank you.
