# create-posts-with-csv
This page template is generating posts with a csv file.

1. Update $posttype variable, and lines which $data is using with your needs. $data is a row data and $data[0] is first column's data.
2. If you're using ACF, you can use update_field method.
3. Put this file in Wordpress theme's folder and create a page with this template. 
4. If you open this page with url params like http://sampleurl.com/csv-sample-page?url=http://sampleurl.com/wp-content/uploads/2022/03/test1.csv it will create posts
based on csv.
5. If a post with same title created before, it will be updated.
