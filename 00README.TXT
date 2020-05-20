The 01-create-index-files.sh script can be used to create empty index.html
in every directory where they don't exist.

Although the myweb server does not show directory listings many web servers
are configured to do this. By creating an index.html file (even empty)
this causes the server to transmit nothing when the URL is a directory.
