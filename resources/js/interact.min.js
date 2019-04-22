(function() {

  let CHANNEL_API = {
    "_invoker": null,
    "_cached": null,
    "_channel": null,
    "_callback": null,
    "_options": {
      "url": "/interact/messages",
      "key": null
    },
    /**
     * Refresh channel data
     */
    "_refresh": () => {
      fetch(CHANNEL_API._options.url, {

        headers: {
          "Authorization": "Bearer " + CHANNEL_API._options.key,
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ "channel": CHANNEL_API._channel }),
        method: "POST"

      }).then((response) => { return response.json(); } )
        .catch((error) => {
          return;
        })
        .then(response => {

          if (JSON.stringify(CHANNEL_API._cached) !== JSON.stringify(response)) {
            if (response.message !== null) {
              CHANNEL_API._cached = response;
              CHANNEL_API._callback(response.message);
            }
          }

      });
    }
  };

  window.channel = {
    /**
     * Listen to messages
     *
     * @param {string} channel
     * @param {callback} callback
     */
    listen: (channel, callback) => {

      CHANNEL_API._channel  = channel;

      CHANNEL_API._callback = callback;

      CHANNEL_API._invoker = setInterval(CHANNEL_API._refresh, 2000);

    },
    /**
     * Configure channel
     *
     * @param {object} options
     */
    config: (options) => {
      CHANNEL_API._options = {
        "url": options.url,
        "key": options.key
      };
    }
  };

})();
