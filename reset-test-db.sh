set -x;

app/yiic databaseschema --connectionID=dbTest dropAllTablesAndViews --verbose=0
app/yiic databaseschema --connectionID=dbTest loadSql --path=db/schema.sql --verbose=0
app/yiic migrate --connectionID=dbTest --interactive=0 > /dev/null
export connectionID=dbTest
./_provision.sh