Proof API
=====================
Proof API module contains classes for consuming the Proof API and displaying the results:

 - Proof API Controller: A class responsible for organizing and rendering all requests within the Proof API module
 - Proof API Requests: A service for performing CRUD requests on the Proof API
 - Proof API Utilities: A service containing pre-render functions
 - New Video Form: A class for taking in new video data from the user, validating the data by several criteria,
    and posting it through the Proof API Requests service
 - View/Vote Commands: Classes that define AJAX callback commands for updating the view and vote counts on a page.
 - NowPlayingBlock, TopTenViewsBlock, and TopTenVotesBlock display lists of videos that can be added to various pages
 - Proof API module uses a custom theme, "Videos," which extends the Bootstrap theme

Author/Maintainer
======================
- Pat Kahnke (patkahnke@gmail.com)

README Created On:
======================
September 7, 2016

README Updated On:
======================
October 8, 2016
