const mysql = require('mysql');
const express = require('express');
var app = express();
const Parser = require('body-parser');
app.use(Parser.urlencoded({extended: true}));

var mysqlconnection = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    database:'students'
});

mysqlconnection.connect((err)=>{
    if(!err)
    console.log('DB Connection succeeded');
    else
    console.log('DB Connection failed' + JSON.stringify(err,undefined,2));
})

app.listen(9999, ()=>{
    console.log('Server is running at port 9999...')
});


//GET all students from the database
app.get('/api/v1/student',(req,res)=>{
    mysqlconnection.query('SELECT * FROM student',(err,rows, fields)=>{
        if(!err){
         res.send(rows);
        }
        else
        console.log(err);
    });
});

//get a student

app.get('/api/v1/student/:id',(req,res)=>{
    mysqlconnection.query('SELECT * FROM student WHERE id = ? ',[req.params.id],(err,rows, fields)=>{
        if(!err){
         res.send(rows);
        }
        else
        console.log(err);
    });
});

//delete a student
app.delete('/api/v1/student/:id',(req,res)=>{
    mysqlconnection.query('DELETE FROM student WHERE id = ? ',[req.params.id],(err,rows, fields)=>{
        if(!err){
         res.send('Deleted successfuly');
        }
        else
        console.log(err);
    });
});

//insert a student
app.post('/submit',(req,res)=>{
    var sql ="insert into student values(null,'"+ req.body.firstname +"','"+ req.body.lastname+"','"+ req.body.groupnumber+"')";
    mysqlconnection.query(sql,function(err,rows,fields){
        console.log(req.body);
  
        if(!err){
            res.send('Saved successfuly');
           }
           else
           console.log(err);
        });

    });



