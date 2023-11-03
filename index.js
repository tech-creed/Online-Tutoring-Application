require('dotenv').config()
const express = require("express")

const app = express()
const cors = require('cors')

app.set('view engine', 'ejs')

app.use(cors())
app.use(express.static('public'))
app.use(express.json())
app.use(express.urlencoded({
  extended: true
}))

const PORT = 5000;

app.get("/",(req,res)=>{
    res.render('index')
})


app.listen(PORT, () => console.log(`Server running on port: http://localhost:${PORT}`));