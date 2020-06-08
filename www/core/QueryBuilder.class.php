<?php


class QueryBuilder
{
  protected $connection;
  protected $query;
  protected $parameters;
  protected $alias;

  public function __construct(DBInterface $connection = NULL)
  {
    $this->connection = $connection;
  }

  public function select( string $values = '*'): QueryBuilder
  {
    $this->query = 'select '.$values.' ';
    return $this;
  }

  public function from( string $table, string $alias): QueryBuilder
  {
    $this->alias = $alias;
    $this->query .= 'from '.$table.' as '.$this->alias.' ';
    return $this;
  }

  public function where( string $conditions): QueryBuilder
  {
    $this->where .= $where;
    return $this;
  }

  public function setParameter( string $key, string $value): QueryBuilder
  {
    $this->parameters[$key] = $value;
    return $this;
  }

  public function join( string $table, string $aliasTarget, string $fieldSource = "id", string $fieldTarget = "id"): QueryBuilder
  {
    array_push($this->join," JOIN ".$table." ".$aliasTarget." ON ".$fieldSource." = ".$fieldTarget);
    return $this;
  }

  public function leftJoin( string $table, string $aliasTarget, string $fieldSource = "id", string $fieldTarget = "id"): QueryBuilder
  {
    array_push($this->join," LEFT JOIN ".$table." ".$aliasTarget." ON ".$fieldSource." = ".$fieldTarget);
    return $this;
  }

  public function rightJoin(string $table, string $aliasTarget, string $fieldSource = 'id', string $fieldTarget = 'id'): QueryBuilder
  {
    array_push($this->join," RIGHT JOIN ".$table." ".$aliasTarget." ON ".$fieldSource." = ".$fieldTarget);
    return $this;
  }

  public function innerJoin(string $table, string $aliasTarget, string $fieldSource = 'id', string $fieldTarget = 'id'): QueryBuilder
  {
      array_push($this->join," INNER JOIN ".$table." ".$aliasTarget." ON ".$fieldSource ." = ".$fieldTarget);
      return $this;
  }

  public function addToQuery(string $query): QueryBuilder
  {
    $this->query.=" ".$query;
  }

  public function getQuery(): ResultInterface
  {
    return $this->connection->query($this->toSQL(), $this->parameters);
  }

}
