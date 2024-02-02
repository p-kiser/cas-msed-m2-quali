# Permutations (PHP)

Run:

    php perm.php MODE SIZE

- `MODE`: either `R`ecursive, oder `I`iterative
- `SIZE`: size of the input array

Examples:

    $ php perm.php R 9
    R: 362880 permutations in 0.107521011 seconds
    $ php perm.php I 9 
    I: 362880 permutations in 0.517928187 seconds 
    $ php perm.php I 10
    I: 3628800 permutations in 5.956723439 seconds