# jr-software-engr-exam-2018

A: 	1. First Click on the given link
	2. Then on that panel top right click on the fork button to make fork repository under the given master repository
	3. The from middle green button 'Clone or download' copy the git url
	4. NOw Open terminal/command line tool go to the specific directory in your local mechine
	   and write gil clone 'the copied url' press enter
	5. then go to your created directory from git

	6. the type git remote and the git remote add upstream 'your master repository git url'

	7. then type git fetch upstream and press enter
	8. then check git status wheather anything has been changed or not
	9. to add the files type git add 'file_name' and again check status step 8
	10. if status seems ok then type git commit -m 'comment if any' and press enter
	
	11. then master will be green that means all ok
	12. then again check status to see wheather all ok or not
	13. then type git push origin master
