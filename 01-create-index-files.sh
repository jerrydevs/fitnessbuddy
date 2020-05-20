#!/bin/bash
find . -type d | while read d ; do
  if [ ! -f "${d}/index.html" ] && [ ! -f "${d}/index.php" ]; then
    # No index.{html,php} file found in directory, create an empty
    # html file...
    echo -n "Creating empty index.html file in ${d}... "
    touch "${d}/index.html"
    echo "Done."
  fi
done
