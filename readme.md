## responsive-crud-contest freelancer.com

Built with Laravel.


php artisan doctrine:schema:drop
php artisan doctrine:schema:create

Doctrine clear cache:
app/console doctrine:cache:clear-metadata
 app/console doctrine:cache:clear-query
 app/console doctrine:cache:clear-result

PhPunit
For composer installations you should use 2nd ("Use custom loader") option.
The edit box -- you should point it to your autoloader script (yes -- composer autoloader script).

DataTables plugin:
https://datatables.net/reference/api/

Standings: [
    Team:{
        Rank : auto
        Name : ""
        LastPlayed: "date"
        Won: 1
        Draw:1
        Lost:1
        GoalsFor:1
        GoalsAgainst:1
        MatchesPlayed: auto
        GoalDifference: auto
        Points: auto
    }
]
