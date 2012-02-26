I'm not sure how the hell this thing works yet. --philip

Corey here: What I've added is a jQuery-formatted version, along with folders for stuff. I'm still kinda lost too, but it's progress, right? Also, Dr. Moshell has confirmed that our "show and tell" is on the 28th, with the project being graded over the following weekend.

login now working at minimum capacity. --philip
	addendum: I plan on merging main_login.php with project2.php.
		as it is right now, checklogin.php points to candidates.php, but it's not properly cycling through the pesudo pages you guys have created, so I'll try to fix that.

missed class today and don't have contact info for corey or stephanie, can anyone update with what's going on? --philip

class was pretty much just the groups presenting project 3 ideas, and the information that's in the lec7 presentation and lab6 doc on the class site. My email: stefaneyr@knights.ucf.edu, phone #: (321)960-8387. facebook messages are fine, too. --stefaney

*** Database Info *** ph652925 / carter   ---philip

** Testing commit to repo.

Corey again: Looked into the checkboxes thing, and the only solutions I found were jQuery solutions. We're just starting to learn jQuery in my other class, and I can't learn enough in two days to fix something up. Anyone good with jQuery is welcome to try.

^^^ You shouldn't need any jQuery. <input type='checkbox' checked='yes'> makes them default to checked. create an if statement in php that looks at the database to see if voted == true, then set checked = yes. no jQuery, no Javascript, no AJAX, just simple HTML and PHP.