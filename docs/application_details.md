### Application structure

## Landing page 
2 forms :
* Login form
username or e-mail address
password
recover password link
remember me ?
login button

* Register form
username
e-mail address
password
password confirmation
remember me ?
register button

## Movies list
Menu (top or off-canvas...) :
* Add a movie
	-> title
	-> year
	-> poster
	-> description (max-length)
	-> genre
	-> director
	-> stars
	-> note (0 to 5) (optional at creation, but should be available when clicking on a movie in the listings)
* Favorites
	-> show a list of the fav movies (more then 4 stars ?)
* My profile 
	-> username
	-> e-mail
	-> avatar ? maybe
	-> password
	-> confirm password
* Logout 
	-> back to login page

Listing (infinite scroll, increment 7 movies) :
Show the movie blocks :
Poster
Title | Year
Director
Genre
Description

When clicked, show the rating system (0 to 5 stars), the choice is automatically updated and then rating system close itself.

When swipe the movie block it is removed.
