dist/wordpress_spa.zip: plugins/wordpress/iflex_spa.php plugins/wordpress/readme.txt js/iflex_spa.js
	@rm -f dist/iflex_spa.zip
	@mkdir -p dist/tmp
	@cp -r js dist/tmp
	@cp plugins/wordpress/iflex_spa.php dist/tmp	
	@cp plugins/wordpress/readme.txt dist/tmp	
	@cd dist/tmp; zip -r iflex_spa.zip iflex_spa.php readme.txt js/*
	@cd dist/tmp; mv iflex_spa.zip ..
	@rm -rf dist/tmp

clean:
	@rm -f dist/iflex_spa.zip
	@rm -rf dist/tmp
