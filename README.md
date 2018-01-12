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




<b>Get Mongodb Databse Backup form Live Server & Restore</b>

Using SSH Account.
Goto Project Directory Then run Following Command.
1) >> mongodump -u YOUR USERNAME -p YOUR PASSWORD -d DATABASE NAME
2) >> mongodump -u YOUR USERNAME  -d DATABASE NAME
   >> Enter ->  YOUR PASSWORD

now you Show dump folder in your Directory. 
just Create zip using following command
>> zip -r dump.zip dump/

Download zip in your Local Directory.
move dump.zip in your directory thne extract zip. now in dump folder you see database name folder.

Now Restore data in Your Local Server .

>> mongorestore -d DATABSE NAME --dir dump/BATABSE NAME/



<b>async.parallel</b>


					let task = []
					player.friends.forEach(function(plr){
						task.push(function(callback){
							Game.AppSource.Player.Models.Player.findOne({ id: plr.friend_id })
							.exec(function (err, player) {
								 
								//console.log(player);
								callback(null,{
									id : plr.friend_id,
									level : player.level,
									name : player.username,
									avatar : player.selected_avatar,
									coin : player.coin,
									sharkpoolrewordcoin : (player.coin * 1)/100
								})
							});
						})
					});
					async.parallel(task,function(err, results) {
						callback(null, results);
					});





-------------------------------------




		let task = []
			for (let j = 0; j < room.players.length; j++) {
				let playerId = room.players[j].id;
				let won = 0;
				let lost = 0;
				let escaped = 0;
				task.push(function(callback){
					 
					
							async.series({
								won: function(callback) {
									Room.count({ 'game.winner.id': playerId }).exec(function (err, won_count) {
										if (err) { callback(err); }
											callback(null, won_count);
									})
								},
								lost: function(callback){
									Room.count({ players: { $elemMatch: { id: playerId } } }, { 'game.winner.id': { $ne: playerId } }).exec(function (err, lost_count) {
										if (err) { callback(err); }
										callback(null, lost_count);
									})
								},
								escaped: function(callback){
									Room.count({ players: { $elemMatch: { id: playerId, status: 'Left' } } }).exec(function (err, escaped_count) {
										if (err) { callback(err); }
										callback(null, escaped_count);
									});
								}
							}, function(err, results) {
									// results is now equal to: {one: 1, two: 2}
									console.log(results.won);
									console.log(results.lost);
									console.log(results.escaped);
		
									callback(null, {
										id:room.players[j].id,
										name:room.players[j].playerName,
										data:{
											won:results.won,
											lost:results.lost,
											escaped:results.escaped
										}
									});
							});
				})
			};
			async.parallel(task,function(err, results) {
				
				console.log("Results :: ",results);
				return response.send({ status: 'success', message: "Player ScoreBoard", result:results});
			});










