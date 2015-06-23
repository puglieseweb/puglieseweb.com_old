<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; ?>
<div id="content">

<h1>SQL</h1>
<h2>Definition</h2>
<br>
<h3>ANSI (American National Standard Institute)</h3>
<h3>TLA (Three-Letter Acronyn </h3>
<h4>DDL (Data Definition Language)</h4>
<h4>DML (Data Manipulation Language)</h4>
<h4>DCL (Data Controll Language)</h4>
<br>
<br>
<br>
<br>
<h3>GROUP BY Clause</h3>
<br>
The GROUP BY clause can be used in a SELECT statement to <span
 style="font-weight: bold;" class="underline">collect data across
multiple records</span> and <span style="font-weight: bold;"
 class="underline">group the results by one or more columns</span>.<br>
<br>
The syntax for the GROUP BY clause is:<br>
<br>
<p class="code"><strong>SELECT</strong> column1, column2, ... column_n,
aggregate_function (expression)<br>
FROM tables<br>
WHERE predicates<br>
<strong>GROUP BY </strong>column1, column2, ... column_n;
</p>
<br>
<br>
aggregate_function can be a function such as SUM, COUNT, MIN, or MAX.<br>
<br>
<br>
Example using the SUM function<br>
<br>
For example, you could also use the SUM function to return the name of
the department and the total sales (in the associated department).<br>
<br>
<p class="code"> SELECT department, SUM(sales) as "Total sales"<br>
FROM order_details<br>
GROUP BY department;
</p>
<br>
Because you have listed one column in your SELECT statement that is not
encapsulated in the SUM function, you must use a GROUP BY clause. The
department field must, therefore, be listed in the GROUP BY section.<br>
<br>
<br>
Example using the COUNT function<br>
<br>
For example, you could use the COUNT function to return the name of the
department and the number of employees (in the associated department)
that make over $25,000 / year.<br>
<br>
<p class="code">SELECT department, COUNT(*) as "Number of employees"<br>
FROM employees<br>
WHERE salary &gt; 25000<br>
GROUP BY department;
</p>
<br>
<br>
<br>
Example using the MIN function<br>
<br>
For example, you could also use the MIN function to return the name of
each department and the minimum salary in the department.<br>
<br>
<p class="code"> SELECT department, MIN(salary) as "Lowest salary"<br>
FROM employees<br>
GROUP BY department;
</p>
<br>
Example using the MAX function<br>
<br>
For example, you could also use the MAX function to return the name of
each department and the maximum salary in the department.<br>
<br>
<p class="code">SELECT department, MAX(salary) as "Highest salary"<br>
FROM employees<br>
GROUP BY department;
</p>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>