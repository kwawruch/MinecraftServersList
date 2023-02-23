//ReturnServerVersions().versions for array or .versionsString for string
function ReturnServerVersions(versionsArray) {
    if(versionsArray.length == 0) return "??";
    var v = versionsArray.map(x => x.minecraftVersion.version);
    var vs = v.join(', ');
    var obj = {
        versions: v,
        versionsString: vs,
    };

    return obj;
}