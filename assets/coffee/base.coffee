site =
	index: () ->

if typeof site[$('body').attr 'data-page'] is "function"
	do site[$('body').attr "data-page"]

