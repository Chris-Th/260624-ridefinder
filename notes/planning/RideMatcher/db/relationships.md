# Relationship Overview

```text
User
│
├── hasOne Profile
│
├── hasMany Hosted Rides
│
└── belongsToMany Rides
      through ride_user


Profile
│
├── belongsTo User
│
├── belongsTo Typical Discipline
│
├── belongsTo Typical Pace
│
├── belongsTo Typical Distance Range
│
├── belongsToMany Disciplines
│
└── belongsToMany Ride Types


Ride
│
├── belongsTo Host(User)
│
├── belongsTo Discipline
│
├── belongsTo Pace
│
├── belongsToMany Types
│
└── belongsToMany Participants
```
