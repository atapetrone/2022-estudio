function isArray(elemento) {
    return Array.isArray(elemento);
}

Array.prototype.sameStructureAs = function (other) {
    if (this.length !== other.length) {
        return false;
    }
    for (var i = 0; i < this.length; i++) {
        if (isArray(this[i]) && isArray(other[i])) {
            if (!this[i].sameStructureAs(other[i])) {
                return false;
            }
        } else if (!isArray(this[i]) && isArray(other[i])) {
            return false;
        } else if (isArray(this[i]) && !isArray(other[i])) {
            return false;
        }
    }
    return true;
};

console.log([[[], []]].sameStructureAs([[[], []]]));
