var request=require('supertest');
var app=require('../index');

describe("alldeveloper",function(){
	it("welcome to the alldeveloper",function(done){
		request(app).get('/showdeveloper')
		.expect(200)
		.expect(/Developer information/,done)
	})
})

describe("phpdeveloper",function(){
	it("welcome to the phpdeveloper",function(done){
		request(app).get('/phpdeveloper')
		.expect(200)
		.expect(/PHP Developer/,done)
	})
})

describe("phpandenglishdeveloper",function(){
	it("welcome to the php and english developer",function(done){
		request(app).get('/phpandendeveloper')
		.expect(200)
		.expect(/PHP Developer/,done)
	})
})