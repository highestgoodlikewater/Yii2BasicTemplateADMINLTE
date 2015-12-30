
<?php 
use giovdk21\yii2SyntaxHighlighter\SyntaxHighlighter as SyntaxHighlighter;
SyntaxHighlighter::begin(['brushes' => ['php']]);
					$code = "";
					$code .= "<?php ";
					$code .= "echo 'Hello World' ";
					$code .= "?>";
					
					echo SyntaxHighlighter::getBlock('
					<?php 
						echo "Hello World";
						$string = "Suhendra Yohana Putra";
						echo "Char Length is ".strlen($string);
						//output : Char Length is '.strlen("Suhendra Yohana Putra").'
					?>
					', 'php');
					SyntaxHighlighter::end();
				?>