# Permutations (Rust)

Build:

    rustc -C opt-level=3 perm.rs

Run:

    ./perm MODE SIZE

- `MODE`: either `R`ecursive, oder `I`iterative
- `SIZE`: size of the input array

For example:

    $ ./perm I 11                 
    I: 39916800 permutations in 4.149067326 seconds
