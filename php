
   Illuminate\Database\QueryException 

  SQLSTATE[42S02]: Base table or view not found: 1146 Table 'blog.settings' doesn't exist (Connection: mysql, SQL: select * from `settings`)

  at vendor\laravel\framework\src\Illuminate\Database\Connection.php:795
    791Γûò         // If an exception occurs when attempting to run a query, we'll format the error
    792Γûò         // message to include the bindings with SQL, which will make this exception a
    793Γûò         // lot more helpful to the developer instead of just the database's errors.
    794Γûò         catch (Exception $e) {
  Γ₧£ 795Γûò             throw new QueryException(
    796Γûò                 $this->getName(), $query, $this->prepareBindings($bindings), $e
    797Γûò             );
    798Γûò         }
    799Γûò     }

  i   A table was not found: You might have forgotten to run your database migrations. 
      https://laravel.com/docs/master/migrations#running-migrations

  1   [internal]:0
      Illuminate\Foundation\Application::Illuminate\Foundation\{closure}(Object(App\Providers\AppServiceProvider))

  2   vendor\laravel\framework\src\Illuminate\Database\Connection.php:416
      PDOException::("SQLSTATE[42S02]: Base table or view not found: 1146 Table 'blog.settings' doesn't exist")

