const sanitizeHTML = require('sanitize-html');

module.exports = function(url,callback){
  const mongoose = require('mongoose');
  mongoose.connect(url, callback);

  const Message = mongoose.model(
    'messages',
    { username: String, text: String}
  );


  return {
    create:function(newMessage,callback){
      var message = new Message(newMessage);
      message.save(callback);
    },
    read:function(id,callback){
      Message.findById(id).exec(callback);
    },
    readUsername:function(username,callback){
      Message.find({username: username}, function(err, docs){}).exec(callback);
    },
    readAll:function(callback){
      Message.find({}, function(err, docs){}).exec(callback);
    },
    update:function(id,updatedMessage,callback){
      Message.findByIdAndUpdate(id, updatedMessage, callback);
    },
    delete:function(id,callback){
      Message.findByIdAndRemove(id, callback);
    },
    deleteAll:function(callback){
      Message.remove({},callback);
    },
    disconnect:function(){
      mongoose.disconnect();
    }
  };
};

