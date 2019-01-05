InnoDB 表 T，如果你要重建索引 k，你的两个 SQL 语句可以这么写

```
alter table T drop index k;
alter table T add index(k);

```
or
```
alter table T drop primary key;
alter table T add primary key(id);

```

对于上面这两个重建索引的作法，说出你的理解。如果有不合适的，为什么，更好的方法是什么？





