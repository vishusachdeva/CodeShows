<?php
    $map = [
        "C" => 1,
        "CPP" => 2,
        "Java" => 3,
        "C#" => 9,
        "PHP" => 7,
        "Ruby" => 8,
        "Python 2.0" => 5,
        "Perl" => 6,
        "Haskell" => 12,
        "Clojure" => 13,
        "Scala" => 15,
        "Bash" => 14,
        "Mysql" => 10,
        "Oracle" => 11,
        "Erlang" => 16,
        "CLISP" => 17,
        "Lua" => 18,
        "Go" => 21
        ];
?>
<style>
#input {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
</style>
<script src="<?php echo JS_PATH.'compiler.js'; ?>" ></script>
<div class="w3-bar w3-black w3-border-top w3-border-bottom">
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-right" onclick="submit_mode_switch(event, 1)" style="width:50%"><b>Write Code</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple" onclick="submit_mode_switch(event, 2)" style="width:50%"><b>Submit File</b></button>
</div>
<div id="editor_block" class="container" style="display:none;width:90%;">
    <form>

<!--=================================================================================-->
<link rel="stylesheet" href="<?php echo(IDE_PATH); ?>demo/kitchen-sink/styles.css" type="text/css" media="screen" charset="utf-8">
<style>
    #editor {
        position: relative;
        width: 100%;
        height: 90%;
        margin:auto;
    }
</style>
<script>
  var curr_lang='c';
</script>
<textarea id="c" style="display:none">
//simple c code

#include <stdio.h>
int main() {
    int n, temp;
    scanf("%d", &n);
    while(n--) {
        scanf("%d", &temp);
        printf("%d\n", temp);
    }
}

</textarea>
<textarea id="c_cpp" style="display:none">
// c++ code

#include <iostream>
using namespace std;

int main ()
{
    //your code
    return 0;
}

</textarea>
<textarea id="java" style="display:none">
public class ClassName {

    public static void main(String[] args) {
        double d = Double.parseDouble("2.2250738585072012e-308");

        // code
        System.out.println("Value: " + d);
    }
}
</textarea>
<textarea id="csharp" style="display:none">
public void HelloWorld() {
    //Say Hello!
    Console.WriteLine("Hello World");
}
</textarea>
<textarea id="php" style="display:none">
&lt;&#63;php

function nfact($n) {
    if ($n == 0) {
        return 1;
    }
    else {
        return $n * nfact($n - 1);
    }
}

echo "\n\nPlease enter a whole number ... ";
$num = trim(fgets(STDIN));

// ===== PROCESS - Determing the factorial of the input number =====
$output = "\n\nFactorial " . $num . " = " . nfact($num) . "\n\n";
echo $output;

&#63;&gt;
</textarea>
<textarea id="ruby" style="display:none">
#!/usr/bin/ruby

# Program to find the factorial of a number
def fact(n)
    if n == 0
        1
    else
        n * fact(n-1)
    end
end

puts fact(ARGV[0].to_i)

class Range
  def to_json(*a)
    {
      'json_class'   => self.class.name, # = 'Range'
      'data'         => [ first, last, exclude_end? ]
    }.to_json(*a)
  end
end

{:id => ?", :key => "value"}


    herDocs = [<<'FOO', <<BAR, <<-BAZ, <<-`EXEC`] #comment
  FOO #{literal}
FOO
  BAR #{fact(10)}
BAR
  BAZ indented
    BAZ
        echo hi
    EXEC
puts herDocs
</textarea>
<textarea id="python" style="display:none">
#!/usr/local/bin/python

import string, sys

t = int(raw_input())
while t:
    n = int(raw_input())
    print(n)
    t -= 1;
</textarea>
<textarea id="perl" style="display:none">
#!/usr/bin/perl
=begin
 perl example code for Ace
=cut

use v5.10;
use strict;
use warnings;

use List::Util qw(first);
my @primes;

# Put 2 as the first prime so we won't have an empty array
push @primes, 2;

for my $number_to_check (3 .. 200) {
    # Check if the current number is divisible by any previous prime
    # if it is, skip to the next number.  Use first to bail out as soon
    # as we find a prime that divides it.
    next if (first {$number_to_check % $_ == 0} @primes);

    # If we reached this point it means $number_to_check is not
    # divisable by any prime number that came before it.
    push @primes, $number_to_check;
}

# List out all of the primes
say join(', ', @primes);

</textarea>
<textarea id="haskell" style="display:none">
-- Type annotation (optional)
fib :: Int -> Integer

-- With self-referencing data
fib n = fibs !! n
        where fibs = 0 : scanl (+) 1 fibs
        -- 0,1,1,2,3,5,...

-- Same, coded directly
fib n = fibs !! n
        where fibs = 0 : 1 : next fibs
              next (a : t@(b:_)) = (a+b) : next t

-- Similar idea, using zipWith
fib n = fibs !! n
        where fibs = 0 : 1 : zipWith (+) fibs (tail fibs)

-- Using a generator function
fib n = fibs (0,1) !! n
        where fibs (a,b) = a : fibs (b,a+b)
</textarea>
<textarea id="clojure" style="display:none">
(defn parting
  "returns a String parting in a given language"
  ([] (parting "World"))
  ([name] (parting name "en"))
  ([name language]
    ; condp is similar to a case statement in other languages.
    ; It is described in more detail later.
    ; It is used here to take different actions based on whether the
    ; parameter "language" is set to "en", "es" or something else.
    (condp = language
      "en" (str "Goodbye, " name)
      "es" (str "Adios, " name)
      (throw (IllegalArgumentException.
        (str "unsupported language " language))))))

(println (parting)) ; -> Goodbye, World
(println (parting "Mark")) ; -> Goodbye, Mark
(println (parting "Mark" "es")) ; -> Adios, Mark
(println (parting "Mark", "xy")) ; -> java.lang.IllegalArgumentException: unsupported language xy
</textarea>
<textarea id="scala" style="display:none">
// http://www.scala-lang.org/node/54

package examples.actors

import scala.actors.Actor
import scala.actors.Actor._

abstract class PingMessage
case object Start extends PingMessage
case object SendPing extends PingMessage
case object Pong extends PingMessage

abstract class PongMessage
case object Ping extends PongMessage
case object Stop extends PongMessage

object pingpong extends Application {
  val pong = new Pong
  val ping = new Ping(100000, pong)
  ping.start
  pong.start
  ping ! Start
}

class Ping(count: Int, pong: Actor) extends Actor {
  def act() {
    println("Ping: Initializing with count "+count+": "+pong)
    var pingsLeft = count
    loop {
      react {
        case Start =>
          println("Ping: starting.")
          pong ! Ping
          pingsLeft = pingsLeft - 1
        case SendPing =>
          pong ! Ping
          pingsLeft = pingsLeft - 1
        case Pong =>
          if (pingsLeft % 1000 == 0)
            println("Ping: pong from: "+sender)
          if (pingsLeft > 0)
            self ! SendPing
          else {
            println("Ping: Stop.")
            pong ! Stop
            exit('stop)
          }
      }
    }
  }
}

class Pong extends Actor {
  def act() {
    var pongCount = 0
    loop {
      react {
        case Ping =>
          if (pongCount % 1000 == 0)
            println("Pong: ping "+pongCount+" from "+sender)
          sender ! Pong
          pongCount = pongCount + 1
        case Stop =>
          println("Pong: Stop.")
          exit('stop)
      }
    }
  }
}
</textarea>
<textarea id="sql" style="display:none">
SELECT city, COUNT(id) AS users_count
FROM users
WHERE group_name = 'salesman'
AND created > '2011-05-21'
GROUP BY 1
ORDER BY 2 DESC
</textarea>
<textarea id="erlang" style="display:none">
  %% A process whose only job is to keep a counter.
  %% First version
  -module(counter).
  -export([start/0, codeswitch/1]).

  start() -> loop(0).

  loop(Sum) ->
    receive
       {increment, Count} ->
          loop(Sum+Count);
       {counter, Pid} ->
          Pid ! {counter, Sum},
          loop(Sum);
       code_switch ->
          ?MODULE:codeswitch(Sum)
          % Force the use of 'codeswitch/1' from the latest MODULE version
    end.

  codeswitch(Sum) -> loop(Sum).
</textarea>
<textarea id="lisp" style="display:none">
(defun prompt-for-cd ()
   "Prompts
    for CD"
   (prompt-read "Title" 1.53 1 2/4 1.7 1.7e0 2.9E-4 +42 -7 #b001 #b001/100 #o777 #O777 #xabc55 #c(0 -5.6))
   (prompt-read "Artist" &rest)
   (or (parse-integer (prompt-read "Rating") :junk-allowed t) 0)
  (if x (format t "yes") (format t "no" nil) ;and here comment
  ) 0xFFLL -23ull
  ;; second line comment
  '(+ 1 2)
  (defvar *lines*)                ; list of all lines
  (position-if-not #'sys::whitespacep line :start beg))
  (quote (privet 1 2 3))
  '(hello world)
  (* 5 7)
  (1 2 34 5)
  (:use "aaaa")
  (let ((x 10) (y 20))
    (print (+ x y))
  ) LAmbDa

  "asdad\0eqweqe"
</textarea>
<textarea id="lua" style="display:none">
--[[--
num_args takes in 5.1 byte code and extracts the number of arguments
from its function header.
--]]--

function int(t)
	return t:byte(1)+t:byte(2)*0x100+t:byte(3)*0x10000+t:byte(4)*0x1000000
end

function num_args(func)
	local dump = string.dump(func)
	local offset, cursor = int(dump:sub(13)), offset + 26
	--Get the params and var flag (whether there's a ... in the param)
	return dump:sub(cursor):byte(), dump:sub(cursor+1):byte()
end

-- Usage:
num_args(function(a,b,c,d, ...) end) -- return 4, 7

-- Python styled string format operator
local gm = debug.getmetatable("")

gm.__mod=function(self, other)
    if type(other) ~= "table" then other = {other} end
    for i,v in ipairs(other) do other[i] = tostring(v) end
    return self:format(unpack(other))
end

print([===[
    blah blah %s, (%d %d)
]===]%{"blah", num_args(int)})

--[=[--
table.maxn is deprecated, use # instead.
--]=]--
print(table.maxn{1,2,[4]=4,[8]=8) -- outputs 8 instead of 2

print(5 --[[ blah ]])
</textarea>
<textarea id="golang" style="display:none">
// Concurrent computation of pi.
// See http://goo.gl/ZuTZM.
//
// This demonstrates Go's ability to handle
// large numbers of concurrent processes.
// It is an unreasonable way to calculate pi.
package main

import (
    "fmt"
    "math"
)

func main() {
    fmt.Println(pi(5000))
}

// pi launches n goroutines to compute an
// approximation of pi.
func pi(n int) float64 {
    ch := make(chan float64)
    for k := 0; k <= n; k++ {
        go term(ch, float64(k))
    }
    f := 0.0
    for k := 0; k <= n; k++ {
        f += <-ch
    }
    return f
}

func term(ch chan float64, k float64) {
    ch <- 4 * math.Pow(-1, k) / (2*k + 1)
}

</textarea>


<div id="optionsPanel" style="position:relative;width:100%;height:10%;margin:auto;">
  <table id="controls" style="height:100%">
    <tr type="hidden">
      <td style="width:12.5%;text-align:center;">
        <label for="doc">Language</label>
      </td>
      <td style="width:12.5%;">
        <select id="doc" size="1" class="w3-border w3-select" onchange="document.getElementById(curr_lang).value=editor.getValue();editor.setValue(document.getElementById(this.value).value);editor.getSession().setMode('ace/mode/'+this.value);curr_lang=this.value;">
        <?php
            $lang = ['c', 'c_cpp', 'java', 'csharp', 'php', 'ruby', 'python', 'perl', 'haskell', 'clojure', 'scala', 'sql', 'erlang', 'lisp', 'lua', 'golang'];
            foreach($lang as $val)
              echo("<option value='".$val."'>".$val."</option>");
          ?>
        </select>
      </td>

	  <td style="width:12.5%;text-align:center;">
        <label for="theme">Theme</label>
      </td>
      <td style="width:12.5%;">
        <select id="theme" size="1" class="w3-border w3-select" onchange="editor.setOption('theme', 'ace/theme/'+this.value);">
        <?php
            $theme = ['chrome', 'clouds', 'cobalt', 'dawn', 'gob', 'gruvbox', 'idle_fingers', 'iplastic', 'katzenmilch', 'kr_theme', 'kurior', 'solarized_dark', 'solarized_light', 'terminal', 'textmate', 'tommorrow_night_blue', 'tommorrow_night_bright', 'tommorrow_night_eightied', 'twilight', 'vibrant_ink'];
            foreach($theme as $val) {
              echo("<option value='".$val."'");
              if ($val == 'twilight') echo(" selected='selected'");
              echo(">".$val."</option>");
            }
          ?>
        </select>

      </td>
	  <td  style="width:12.5%;text-align:center;">
        <label for="fontsize">Font Size</label>
      </td>
      <td style="width:12.5%;">
        <select id="fontsize" size="1" class="w3-border w3-select" onchange="editor.setFontSize(this.value);">
          <?php
            $font_size = [10, 11, 12, 13, 14, 16, 18, 20, 24];
            foreach($font_size as $val) {
              echo("<option value='".$val."px'");
              if ($val == 18) echo(" selected='selected'");
              echo(">".$val."px</option>");
            }
          ?>
        </select>
      </td>
      <td  style="width:12.5%;text-align:center;">
        <label for="autocomplete">Auto Complete</label>
      </td>
      <td style="width:12.5%;">
        <input style="height:50%;width:50%;" type="checkbox" id="autocomplete" onchange="if (this.checked) editor.setOptions({'enableBasicAutocompletion': true, 'enableLiveAutocompletion': true}); else editor.setOptions({'enableBasicAutocompletion': false, 'enableLiveAutocompletion': false});" checked="checked">
      </td>
     </tr>
  </table>
</div>
<div id="editor">&#47;&#47;simple c code

&#35;include &lt;stdio.h&gt;
int main() {
    int n, temp;
    scanf("%d", &n);
    while(n--) {
        scanf("%d", &temp);
        printf("%d\n", temp);
    }
}
</div>
<script src="src/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="src/ext-language_tools.js"></script>
<script src="src/ext-spellcheck.js"></script>
<script>
    var editor = ace.edit("editor");
    editor.setOptions({
        theme: "ace/theme/twilight",
        mode: "ace/mode/c",
        fontSize: "18px",
        autoScrollEditorIntoView: true,
        enableBasicAutocompletion: true,
        enableLiveAutocompletion: true,
        enableSnippets: true
    });
</script>
<!-------=================================================================================-------->

  <script>
		function transfer() {
			document.getElementById('editor_solution').innerHTML = editor.getValue();
		}
	</script>




<!--===========================================================-->

        <textarea style="display:none" name="editor_solution" class="w3-input w3-border w3-margin-top" id="editor_solution" cols="40" rows="15"></textarea>
        <label for="input" class="w3-margin-top">Custom Input</label>
        <textarea name="input" id="input" class="w3-input w3-border"></textarea>
        <label for = 'language_editor' class="w3-margin-top">Select Language</label>
        <select id = 'language_editor' name='language_editor' class="w3-select w3-border">
            <?php foreach($map as $key => $value) { ?>
                <option value = '<?php echo($value);?>'><?php echo($key); ?></option>
            <?php } ?>
        </select>
        <button class="w3-button w3-ripple w3-red w3-hover-cyan w3-margin-top" type="button" id = "run" onclick="transfer();run_code('<?php echo(API_PATH.'run.php'); ?>',
            document.getElementById('language_editor').value, <?php echo($p_id); ?>,
            document.getElementById('editor_solution').value, document.getElementById('input').value, <?php echo($time_limit); ?>)">Run Code</button>
        <?php if ($auth) { ?>
            <button class="w3-button w3-ripple w3-red w3-hover-cyan w3-margin-top" id="editor_submit_solution" type = 'button' onclick="transfer();editor_submit('<?php echo(API_PATH.'eval.php'); ?>',
            document.getElementById('language_editor').value,
            <?php echo($p_id); ?>, document.getElementById('editor_solution').value, <?php echo($time_limit); ?>)">Submit Solution</button>
        <?php } else { ?>
            <br/><br/><code class="w3-codespan">Please Login to Submit Code</code>
        <?php } ?>
    </form>
</div>