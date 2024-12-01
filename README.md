```sql
-- Creation of the base_trabalho.
  CREATE DATABASE base_trabalho;
```

```sql
-- Creation of the 'usuarios' table.
  CREATE TABLE usuarios{
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    telefone VARCHAR(11),
    email VARCHAR(50),
    senha VARCHAR(50),
 };
```
