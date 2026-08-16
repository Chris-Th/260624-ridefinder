{{-- include every possible dynamically generated tw-utility in here so tailwind will include those styles --}}
{{--
Expl: Tailwind scans entire app for its classes and only includes those in the stylesheet it can find .
So, if you have bg-green-{{ $lightness }}/80, ensure to include all possibly generated classes here like bg-green-100/80, bg-green-200/80 etc. This file can be placed anywhere in the app as <x-tw-utils-dummy />
Also, blade comments are not included in the final html.
--}}

{{-- top-left "counter" badge:
bg-endurance-300/40
bg-paceline-300/40
bg-coffee-300/40
bg-bikepacking-300/40
bg-gravel-300/40
bg-family-300/40
bg-adventure-300/40
bg-climbing-300/40
bg-social-300/40
bg-trails-300/40

bg-endurance-500/40
bg-paceline-500/40
bg-coffee-500/40
bg-bikepacking-500/40
bg-gravel-500/40
bg-family-500/40
bg-adventure-500/40
bg-climbing-500/40
bg-social-500/40
bg-trails-500/40

bg-endurance-400
bg-paceline-400
bg-coffee-400
bg-bikepacking-400
bg-gravel-400
bg-family-400
bg-adventure-400
bg-climbing-400
bg-social-400
bg-trails-400

bg-endurance-400/70
bg-paceline-400/70
bg-coffee-400/70
bg-bikepacking-400/70
bg-gravel-400/70
bg-family-400/70
bg-adventure-400/70
bg-climbing-400/70
bg-social-400/70
bg-trails-400/70

border-endurance-800
border-paceline-800
border-coffee-800
border-bikepacking-800
border-gravel-800
border-family-800
border-adventure-800
border-climbing-800
border-social-800
border-trails-800

border-endurance-700
border-paceline-700
border-coffee-700
border-bikepacking-700
border-gravel-700
border-family-700
border-adventure-700
border-climbing-700
border-social-700
border-trails-700

border-endurance-700/50
border-paceline-700/50
border-coffee-700/50
border-bikepacking-700/50
border-gravel-700/50
border-family-700/50
border-adventure-700/50
border-climbing-700/50
border-social-700/50
border-trails-700/50

border-endurance-800/60
border-paceline-800/60
border-coffee-800/60
border-bikepacking-800/60
border-gravel-800/60
border-family-800/60
border-adventure-800/60
border-climbing-800/60
border-social-800/60
border-trails-800/60

border-endurance-800/40
border-paceline-800/40
border-coffee-800/40
border-bikepacking-800/40
border-gravel-800/40
border-family-800/40
border-adventure-800/40
border-climbing-800/40
border-social-800/40
border-trails-800/40

text-endurance-300
text-paceline-300
text-coffee-300
text-bikepacking-300
text-gravel-300
text-family-300
text-adventure-300
text-climbing-300
text-social-300
text-trails-300
--}}

{{-- ride-properties-stamps:
text-blue-300
text-lime-300
text-pink-200
text-yellow-300
text-green-300
text-red-400
text-purple-300

fill-blue-300
fill-lime-300
fill-pink-200
fill-yellow-300
fill-green-300
fill-red-400
fill-purple-300


text-pink-300
text-amber-400



fill-pink-300
fill-amber-400
--}}

{{-- Grid:
col-span-1
col-span-2
col-span-3
col-span-4
col-span-5
col-span-6
col-span-7
col-span-8
col-span-9
col-span-10
col-span-11
col-span-12
col-span-13
col-span-14
col-span-15
col-span-16
col-span-17
col-span-18
col-span-19
col-span-20
col-span-21
col-span-22
col-span-23
col-span-24

row-span-1
row-span-2
row-span-3
row-span-4
row-span-5
row-span-6
row-span-7
row-span-8
row-span-9
row-span-10
row-span-11
row-span-12
row-span-13
row-span-14
row-span-15
row-span-16
row-span-17
row-span-18
row-span-19
row-span-20
row-span-21
row-span-22
row-span-23
row-span-24

--}}
