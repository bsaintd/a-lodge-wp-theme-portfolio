In order to only access the hamburger animation needed and not require the entire dependency, follow these directions:

1. Create a new file in the base folder `/lib/hamburgers` with relevant title for project (eg: `fob-hamburger.scss`)
2. Copy contents of `/lib/hamburgers/hamburgers.scss` into created file
3. Comment out the `$hamburger-types` variables decarlations that WILL NOT be used in this project
4. Comment out the `@import` for the hamburger menu animation that WILL NOT be used in this project
5. Make sure that created file is imported into the top bar or nav .scss whichever is most relevant to structure of project.
6. Follow further directions at https://github.com/jonsuh/hamburgers for complete implementation