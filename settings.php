<div class="wrap">
  <h2>Tag Importer</h2>

<?php
if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
  $tax = $_POST['taxonomy'];
  $terms = split("\n", $_POST['terms']);

  $success = 0;

  foreach ( $terms as $term ) {
    if ( trim( $term ) > '' && wp_insert_term( $term, $tax) ) {
      $success++;
    }
  }

  echo "<h3>Saved $success terms.</h3>";
  
}
?>
</div>

<form method="POST" action="">
<p>Choose a taxonomy to import into:</p>
<select name="taxonomy">
  <option></option>
<?php
$args = array(
  'public'   => true,
  
); 
$output = 'names'; // or objects
$operator = 'and'; // 'and' or 'or'
$taxonomies = get_taxonomies( $args, $output, $operator ); 

if ( $taxonomies ) {
  sort( $taxonomies );
  foreach ( $taxonomies as $taxonomy ) {
    echo "<option value=\"$taxonomy\">" . $taxonomy . "</option>\n";
  }
}
?>
</select>

<p>
  Paste in your tag names (terms), one tag on each row. Duplicate tags will only be added once.
</p>
<textarea name="terms" rows="15" cols="60">
  Apples
  Oranges
  Pears
</textarea>

<input class="button-primary" type="submit" value="Import Tags" />
</form>
