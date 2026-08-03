# Relationship Overview

# Relationships

## User

- hasOne Profile
- hasMany Ride
- belongsToMany Ride (through ride_user)
- hasMany RideFeedback

## Profile

- belongsTo User
- belongsTo Discipline
- belongsToMany Pace
- belongsToMany Discipline
- belongsToMany RideType
- belongsTo Discipline (as typicalDiscipline())

## Discipline

- hasMany Profile
- hasMany Ride
- belongsToMany Profile

## Pace

- hasMany Profile
- hasMany Ride

## RideType

- belongsToMany Profile
- hasMany Ride

## Ride

- belongsTo User
- belongsTo Discipline
- belongsTo Pace
- belongsToMany RideType
- belongsToMany User (through ride_user)
- hasMany RideFeedback

## RideFeedback

- belongsTo Ride
- belongsTo User
