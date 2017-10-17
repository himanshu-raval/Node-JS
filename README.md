# Node-JS
<b>List of Important NPM.</b>
1) nodemon 
- nodemon will watch the files in the directory in which nodemon was started, and if any files change, nodemon will automatically restart your node application.
2) 


<b>JSON Data</b>

```javascript
var json ={
    name : "Himanshu Raval",
    age : 27,
    city : "Ahmedabad"
} 
```

<b>Function Paramiter & Callback Formate</b>

```javascript
var room_id = 123;
paramiter = {id : room_id};
function (paramiter, callback) {
    if(room.id != 123 ){ // check Some Conditions
       	return callback(new Error('id not Matched'));  // Callback with custom Error.
    }

    return callback(err) // callback with code error.

    return callback(null,room) // callback with result

};
```


<b>Waterline Query</b>

1) Select Specific fields.
- Game.AppSource.Player.Models.Player.find({ id: playerId, select: ['avatar'] })
>> Return all Rows.
- Game.AppSource.Player.Models.Player.findOne({ id: playerId, select: ['avatar'] })
- Return Single Objects.

2) Matech Record in Multiple Fields Array objects

Game.AppSource.Game.Controllers.TournamentService.getTournament({
                or:[
                    { 'tables.qf': [{ id: table.id }] },
                    { 'tables.sf': [{ id: table.id }] },
                    { 'tables.fi': [{ id: table.id }] },
                ]}, function (err, tournament) {
                if(err) {
                    return callback(err)
                }
...
                });


3) get Single Data in Object  / it using inside functions
  
```javascript              
model.findOne({ id: data.id })
.exec(function (err, player) {
                if (err) {
                    return callback(err);
					// return callback with error
				}
				if (!player) {
					return callback(new Error('Player not found'));
                    // Return With Custom Error
				}

                // Do Some else
            });

```
4) Wait for Another Process Complite use then.

```javascript
Game.AppSource.Player.Models.Player.findOne({ id: winner.id })
	.then(function (ply) {
            Game.AppSource.Player.Models.Player.update({ id: winner.id }, { coin: player_final_point })
                    .then(function (p_data) {
                        return callback(null, p_data);
                        // Fainal Return
                    .catch(function (err) {
                            return err;
                        })
    .catch(function (err) {
		return err;
	})
```
5) Use promise / use inside functions

```javascript
var promise = new Promise(function (resolve, reject) {

Game.AppSource.Player.Models.Player.findOne({ id: playerId })
	.then(function (player) {
                resolve(player);
    .catch(function (err) {
		reject(err);
	})
               
});
return promise;

```



<b>forEach</b>

```javascript
objectGroup.forEach(function (obj, key) {

    key -> Show index like 0,1,2...
    obj -> content data like obj.id,obj.name...

});
```




<b>MongoDB and MySql some words</b>


MySQL :	MongoDB
---------------
Table -> Collection
Row -> Document
Column -> Field
Joins -> Embedded documents, linking


More info : 
https://www.mongodb.com/compare/mongodb-mysql?jmp=docs
















