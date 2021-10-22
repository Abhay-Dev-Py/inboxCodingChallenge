<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $i=0;
        echo('<table style="border: 1px solid black;
                 border-collapse: collapse;">');
        $handle = fopen("example.txt","r");
        $fileLines = file("example.txt");
        if($handle)
        {
            while( ($line = fgets($handle)) != false )
            {
                $i++;
                if($i%2!=0)
                {
                    //Condition for header
                    if($line[0] == 'I' and str_contains($line,"Harmonic"))
                    {
                        $j = $i;
                        
                        echo('<tr style="border: 1px solid black;
                        border-collapse: collapse;">');
                        echo('<th style="border: 1px solid black;
                        border-collapse: collapse;">'.$line.'</th>');
                        echo('<td style="border: 1px solid black;
                        border-collapse: collapse;">'." ".$fileLines[$j]." ".'</td>');
                        echo('</tr>');
                        // | header -> $line |
                        // |data    -> $fileLines[$j+1] | 
                        
                        
                    }
                }
            }
            fclose($handle);
        }
        echo('</table>');
        
        
    }
}

