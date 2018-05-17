var express        = require('express')
,   app            = express()
,   bodyParser     = require('body-parser')
,   methodOverride = require('method-override')
,   mongoose 		   = require('mongoose')
,   fs						 = require('fs')
,   path 					 = require('path')
, 	faker					 = require('faker')
, 	async 				 = require('async')
, 	_ 				 		 = require('underscore')
,   route          = express.Router()

var con    =  mongoose.connect("mongodb://localhost/softwaretest")
											.then(() =>  console.log('connection successful'))
										 	.catch((err) => console.error(err))
,   port = process.env.PORT || 8000
// ,   models_path = __dirname + '/models'
// 		fs.readdirSync(models_path).forEach(function (file) {
// 		 require(models_path+'/'+file)
// 		})
,  developers 				= mongoose.model('Developer', require('./models/developers').getDeveloperSchema())
,  languages 			 		= mongoose.model('Language',  require('./models/Languages').getLanguageSchema())
,  Programming_lang   = mongoose.model('Programming_lang',  require('./models/Programming_lang').getProgrammingLanguageSchema())


app.use(express.static(__dirname + '/public'));


app.use(bodyParser.json());

app.use(bodyParser.json({ type: 'application/vnd.api+json' }));

app.use(bodyParser.urlencoded({ extended: true }));

app.use(methodOverride('X-HTTP-Method-Override'));

//app.use('/graphPlot', controller);
app.get('/',function (req,res) {
	res.sendFile(__dirname+'/public/home.html'); // load our public/index.html file
	console.log('hi')

});

app.get('/seed',function (req,res) {
	developers.remove(function(err,done) {
		if(err)
			console.log(err)
		else{
			languages.remove(function(err,done) {
				if(err)
					console.log(err)
				else{
					Programming_lang.remove(function(err,done) {
						if(done){
							init()
							res.sendFile(__dirname+'/public/home.html')

						}
					})
				}
			})
		}
	})

});
app.get('/getData',function (req,res) {
	developers
	.find({})
	.populate('languages')
	.populate('programming_lang')
	.exec(function(err,devs) {
		if(err)
			console.log(err)
		else{
			res.status(200).json({dev: devs})
		}
	})

});

app.post('/searchData',function(req,res){
	console.log(req.body)
	var language = req.body.language
	if(language)
		language = language.trim()
	var programming_lang = req.body.programming
	developers
	.find({})
	.populate('languages')
	.populate('programming_lang')
	.exec(function(err,devs) {
		if(err)
			console.log(err)
		else{
			var searchData = []
			for(var i = 0 ; i < devs.length; i++){
				for(var j=0;j<devs[i].programming_lang.length;j++){
					//console.log(devs[i].programming_lang[j].name)
					if(devs[i].programming_lang[j].name.toLowerCase()==programming_lang.toLowerCase()){
						searchData.push(devs[i])
						break;
					}
				}
			}
			var finalSet = []
			if(searchData.length && language){
				for(var i = 0 ; i< searchData.length; i++){
					for(var j=0;j<searchData[i].languages.length;j++){
						if(searchData[i].languages[j].code.toLowerCase()==language.toLowerCase()){
							finalSet.push(searchData[i])
							break;
						}
					}
					if(i==(searchData.length-1))
						res.status(200).json({result: finalSet})
				}
			} else
			res.status(200).json({result: searchData})
		}
	})
})

function init() {
	// async.waterfall([
	// 	function(next){
	// 		pushLanguages()
	// 		next(null,0)
	// 	},
	// 	function(data, next){
	// 		pushProgrammingLanguages()
	// 		next(null,1)
	// 	},
	// 	function(data,next){
	// 		pushDevelopers()
	// 		next(null,2)
	// 	}
	// ],function(err,data){
	// 	updateDependency()
	// })
	let lan_list = [
		{code: 'bn', developers: []},
		{code: 'en', developers: []},
		{code: 'vn', developers: []},
		{code: 'ba', developers: []},
		{code: 'bh', developers: []},
		{code: 'my', developers: []},
		{code: 'dz', developers: []},
	]
	languages.insertMany(lan_list, function (err, languagesDone) {
		if(err)
			console.log(err)
		else{
			console.log('Languages updated')
			let Pl_list = [
				{name: 'C', developers: []},
				{name: 'C++', developers: []},
				{name: 'Python', developers: []},
				{name: 'Java', developers: []},
				{name: 'PHP', developers: []},
				{name: 'Ruby', developers: []},
				{name: 'JavaScript', developers: []},
				{name: 'Swift', developers: []},
			]
			Programming_lang.insertMany(Pl_list, function (err, PlanguagesDone) {
				if(err)
					console.log(err)
				else{
					console.log('Programming Languages updated')
					var dev_list = []
					var dev_email = []
					var Planguage = []
					var language = []

					for(let i = 0; i< languagesDone.length; i++)
						language.push(languagesDone[i]._id.toString())

					for(let i = 0; i< PlanguagesDone.length; i++)
						Planguage.push(PlanguagesDone[i]._id.toString())

					var dev = {}
					for(var i=0,devc=0; ;i++) {
						console.log('Entered' +i)
						dev = {}
						dev.email = faker.internet.email()
						if(dev_email.indexOf(dev.email)<0){
								dev.languages=[]
								dev.programming_lang=[]
								// let templan = shuffle(language)
								// console.log(templan)
								// let tempPlan = shuffle(Planguage)
								// console.log(tempPlan)

								dev.languages=_.sample(language,2)
								dev.programming_lang=_.sample(Planguage,3)
								//console.log(dev.language)
								dev_email.push(dev.email)
								console.log(dev)
								dev_list.push(dev)
								devc++;
								console.log('Pushed '+ i + 'developers')
								if(devc==100)
									break;
						}
					}
					developers.insertMany(dev_list, function (err, devs) {
						if(err)
							console.log(err)
						else{
							console.log('Developers updated')
							var language_dev = {}
							var Planguage_dev = {}
							for (let i = 0; i < language.length; i++)
							language_dev[language[i]] = []
							for (let i = 0; i < Planguage.length; i++)
							Planguage_dev[Planguage[i]] = []

							for (var i = 0; i<language.length;i++){
								for(var j=0; j<devs.length;j++){
									if(devs[j].languages.indexOf(language[i])>-1)
										language_dev[language[i]].push(devs[j]._id)
								}
							}

							for (var i = 0; i<Planguage.length;i++){
								for(var j=0; j<devs.length;j++){
									if(devs[j].programming_lang.indexOf(Planguage[i])>-1)
										Planguage_dev[Planguage[i]].push(devs[j]._id)
								}
							}
							for(var i=0; i<language.length; i++){
								(function(i){
										languages.findOne({'_id' : language[i]}).exec(function(err,lang){
											if(!err && lang){
													// user.updateHistories.push(notification._id);
												lang.developers = language_dev[language[i]];
												lang.save(function(err){
													if(err)
															console.log(err)
													else{
														console.log('updating language dependency for '+ lang._id)
													}
												});
										}
									});
								})(i);
					 	 }


							for(var i=0; i<Planguage.length; i++){
								(function(i){
										Programming_lang.findOne({'_id' : Planguage[i]}).exec(function(err,plang){
											if(!err && plang){
												plang.developers = Planguage_dev[Planguage[i]];
												plang.save(function(err){
													if(err)
															console.log(err)
													else{
														console.log('updating programming language dependency for '+ plang._id)
													}
												});
										}
									});
								})(i);
							}



						}
					});

				}
			});
		}
	});
}

function pushLanguages(){
	let lan_list = [
		{code: 'bn', developers: []},
		{code: 'en', developers: []},
		{code: 'vn', developers: []},
		{code: 'ba', developers: []},
		{code: 'bh', developers: []},
		{code: 'my', developers: []},
		{code: 'dz', developers: []},
	]
	languages.insertMany(lan_list, function (err, languagesDone) {
		if(err)
			console.log(err)
		else{
			console.log('Languages updated')
		}
	});

}

function pushProgrammingLanguages() {
	let Pl_list = [
		{name: 'C', developers: []},
		{name: 'C++', developers: []},
		{name: 'Python', developers: []},
		{name: 'Java', developers: []},
		{name: 'PHP', developers: []},
		{name: 'Ruby', developers: []},
		{name: 'JavaScript', developers: []},
		{name: 'Swift', developers: []},
	]
	Programming_lang.insertMany(Pl_list, function (err, languagesDone) {
		if(err)
			console.log(err)
		else{
			console.log('Programming Languages updated')
		}
	});
}

function pushDevelopers () {
	var dev_list = []
	var dev_email = []
	var Planguage = []
	var language = []
	async.parallel([
		function(callback){
			languages.find({}).exec(function(err, lan) {
				if(err){
					console.log(err)
					callback(null, false);
				} else {
					for(let i = 0; i< lan.length; i++)
						language.push(lan[i]._id.toString())
					callback(null, true);
				}
			})
		},
		function(callback){
			Programming_lang.find({}).exec(function(err, Plan) {
				if(err){
					console.log(err)
					callback(null, false);
				} else {
					for(let i = 0; i< Plan.length; i++)
						Planguage.push(Plan[i]._id.toString())
					callback(null, true);
				}
			})
		}
	],function(err,results){
		if(results){

			for(let i=0; ;i++) {
				let dev = {}
				dev.email = faker.internet.email()
				if(dev_email.indexOf(dev.email)>0){
						dev.language=[]
						dev.planguage=[]
						let templan = shuffle(language)
						let tempPlan = shuffle(Planguage)
						dev.language=templan.splice(0,4)
						dev.planguage=tempPlan.splice(0,4)
						dev_list.push(dev)
						dev_email.push(dev.email)
						i++;
						console.log('Pushed '+ i + 'developers')
						if(i==100)
							break;
				}
			}
			developers.insertMany(dev_list, function (err, devs) {
				if(err)
					console.log(err)
				else{
					console.log('Developers updated')
				}
			});

		}
	})
}

function updateDependency() {

}

function shuffle(array) {
    let counter = array.length;

    // While there are elements in the array
    while (counter > 0) {
        // Pick a random index
        let index = Math.floor(Math.random() * counter);

        // Decrease counter by 1
        counter--;

        // And swap the last element with it
        let temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }

    return array;
}








app.listen(port);

console.log('server started on port ' + port);

exports = module.exports = app;
