function findUniq(arr) {
    let largo = arr.length;
    let diferente1 = arr[0];
    let diferenteApoyo = arr[0];
    arr.forEach((element) => {
        if (diferente1 != element) {
            diferente2 = element;
        }
    });

    return diferente2;
}

console.log(findUniq([1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2]));
