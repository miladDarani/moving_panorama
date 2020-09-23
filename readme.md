A very lightweight moving panorama genrator for Wordpress. Options to add heading and other control functions.

* Instruction *

1. [ mp ] - this is your base shortcode that will display nothing at this stage 
2. [ mp src=" ** INSERT LINK TO IMAGE INSIDE THE QUOTES "] like so: 
   [ mp src="https://images.unsplash.com/photo-1536770011174-70a15f35bec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1397&q=80"]

3. Other attributes are as follows 

    - speed: this controls the speed of the panoram movement, default is 100 - Range 1 to 1000
    - heading: this is your heading that will be displayed over the image , this is you <h1> tag
    - font-size: this is the font size of your heading - default is whatever the themes heading size is 
    - heading_color: this control the color of the h1 tag  , other words , the heading color - default is white
        * you can type you color name like so: heading_color="pink" or purple or whatever color 
        * you can also enter in HEX colors  like so heading_color="#cfcfcf"

        EXAMPLE:
------------------------------------------------------------------------------------------------------------------
    [mp src="https://image.shutterstock.com/image-photo/beautiful-360-degree-panorama-spring-260nw-404515528.jpg" speed="10" heading="Change This Title" heading_color="red" font-size="150px"]



