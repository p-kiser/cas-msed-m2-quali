use std::env;
use std::time::Instant;

fn main() {
    let args: Vec<String> = env::args().collect();

    if args.len() < 3 {
        eprintln!("Usage: perm <R|I> <n>\nR=Recursive, I=Iterative\nn=size of input array)");
        std::process::exit(1);
    }

    let mode = args[1].to_uppercase();
    if mode != "I" && mode != "R" {
        eprintln!("Invalid value, must be <R> or <I>");
        std::process::exit(1);
    }

    let n: usize = args[2].parse().unwrap_or(0);

    let array: Vec<usize> = (0..n).collect();

    let perm: fn(Vec<usize>) -> Vec<Vec<usize>> = if mode == "I" {
        perm_it
    } else {
        perm_rec
    };

    let start = Instant::now();
    let result = perm(array.clone());
    let elapsed_time = start.elapsed().as_secs_f64();
    println!("{}: {} permutations in {} seconds", mode, result.len(), elapsed_time);
}

fn perm_rec(array: Vec<usize>) -> Vec<Vec<usize>> {
    if array.len() <= 1 {
        return vec![array];
    }
    let mut result = Vec::new();
    for (key, &element) in array.iter().enumerate() {
        for perm in perm_rec(array.iter().enumerate().filter_map(|(i, &e)| if i != key { Some(e) } else { None }).collect()) {
            let mut new_perm = vec![element];
            new_perm.extend(perm);
            result.push(new_perm);
        }
    }
    result
}

fn perm_it(mut array: Vec<usize>) -> Vec<Vec<usize>> {
    let mut result = Vec::new();
    let count = array.len();
    let mut c: Vec<usize> = vec![0; count];

    result.push(array.clone());

    let mut i = 0;
    while i < count {
        if c[i] < i {
            if i % 2 == 0 {
                array.swap(0, i);
            } else {
                array.swap(c[i], i);
            }

            result.push(array.clone());
            c[i] += 1;
            i = 0;
        } else {
            c[i] = 0;
            i += 1;
        }
    }
    result
}