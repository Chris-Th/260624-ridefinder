# DB

## Schema

users
-----
id                          bigint PK
name                        string
email                       string unique
email_verified_at           timestamp nullable
password                    string
remember_token              string nullable
created_at                  timestamp
updated_at                  timestamp


profiles
--------
id                          bigint PK
user_id                     bigint FK users.id unique
location                    string
bio                         text nullable
profile_photo_path          string nullable
distance_min_km             integer
distance_max_km             integer nullable
discipline_id               bigint FK disciplines.id nullable
pace_level_id               bigint FK pace_levels.id nullable
created_at                  timestamp
updated_at                  timestamp


disciplines
-----------
id                          bigint PK
name                        string
slug                        string unique
created_at                  timestamp
updated_at                  timestamp


paces
-----------
id                          bigint PK
name                        string
sort_order                  integer
created_at                  timestamp
updated_at                  timestamp


ride_types
----------------
id                          bigint PK
name                        string
slug                        string unique
created_at                  timestamp
updated_at                  timestamp


discipline_profile
------------------
profile_id                  bigint FK profiles.id
discipline_id               bigint FK disciplines.id
PRIMARY(profile_id, discipline_id)


profile_ride_type
-----------------------
profile_id                  bigint FK profiles.id
ride_type_id                bigint FK ride_types.id
PRIMARY(profile_id, ride_type_id)


rides
-----
id                          bigint PK
user_id                     bigint FK users.id

title                       string
description                 text nullable

discipline_id               bigint FK disciplines.id
pace_level_id               bigint FK pace_levels.id

distance_km                 decimal(5,1)
elevation_m                 integer

meeting_point_name          string
meeting_point_address       string

starts_at                   datetime
max_riders                  integer nullable

is_no_drop                  boolean default false
regroup_at_climbs           boolean default false
coffee_stop                 boolean default false
beginner_friendly           boolean default false

created_at                  timestamp
updated_at                  timestamp


ride_ride_type
--------------------
ride_id                     bigint FK rides.id
ride_type_id                bigint FK ride_types.id
PRIMARY(ride_id, ride_type_id)


ride_user
---------
ride_id                     bigint FK rides.id
user_id                     bigint FK users.id

status                      string
joined_at                   datetime

created_at                  timestamp
updated_at                  timestamp

UNIQUE(ride_id, user_id)


ride_feedback
-------------
id                          bigint PK
ride_id                     bigint FK rides.id
user_id                     bigint FK users.id

matched_description         string

created_at                  timestamp
updated_at                  timestamp


--------------
