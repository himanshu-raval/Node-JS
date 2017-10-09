# Node-JS
<b>List of Important NPM.</b>
1) nodemon 
- nodemon will watch the files in the directory in which nodemon was started, and if any files change, nodemon will automatically restart your node application.
2) 


<b>JSON Data</b>
var json ={
    name : "Himanshu Raval",
    age : 27,
    city : "Ahmedabad"
} 


<b>Callback Paramiter</b>

Callback(err,data);


<b>Waterline Query</b>

1) Select Specific fields.
- Game.AppSource.Player.Models.Player.find({ id: playerId, select: ['avatar'] })
>> Return all Rows.
- Game.AppSource.Player.Models.Player.findOne({ id: playerId, select: ['avatar'] })
- Return Single Objects.

2) 




<b>forEach</b>

objectGroup.forEach(function (obj, key) {

    key -> Show index like 0,1,2...
    obj -> content data like obj.id,obj.name...

});















