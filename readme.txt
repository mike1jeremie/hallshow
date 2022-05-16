index.php is the running slide show.
build.php is for creating and editing the slidshow.

The tool is designed to use SVG data. It needs clean svg code.
If using software Inkscape opimized SVGs work best. Other wise hand coded svg
provides the most control.

The timeline is left to right with the begining of the show on the left and the end on the right.
Clicking on the frame in the timeline selects that frame and puts a red border around it.

The build allows adding new frames which show up to the right.
Duplicating of selected frames which also show up on the right.
Deleteing of selected frames.
Shifting selected frames left and right to change the order. And last is the save.
Saved shows will show up on the index the next time it starts at the first frame.

Frame duration is how long the frame is show in seconds.
Fade duration is how long it takes to Fade in and is apart of the duration time.
Thus a 10 second duration with a 5 second fade would mean the fade uses half the total duration.
A fade longer than duration means the frame is not fully visable before the next frame start.

Load SVG is for loading SVG data into the edit window at the bottom for the selected frame.
The edit window can be directly edited adding svg img iframe video etc.
Improper html will break the show.
The edit window will enlarge to fit the contents.

The frames.html file is the data file created at save and is loaded each time index.php and build.php are opened.
It also is loaded each time the show reaches the first frame in the loop.

Note: The browser will need the autoplay of videos turned on for videos to start on their own.
